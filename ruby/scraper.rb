require 'rubygems'
require 'mechanize'
require 'nokogiri'

@linkedin_username = "bonny.lai@gmail.com"
@linkedin_password = "canislupus"

agent = Mechanize.new
agent.user_agent_alias = "Mac Safari"
agent.follow_meta_refresh = true
agent.get("https://www.linkedin.com")

#Login to LI
form = agent.page.form_with(:action => '/uas/login-submit')
form['session_key'] = @linkedin_username
form['session_password'] = @linkedin_password
agent.submit(form)
pp "Login successful"

def search_class(page, search_query)
    page.search(search_query).map do |element|
        if !element.nil? && !element.inner_html.nil?
            element.inner_html
        end
    end
end

def search_image_class(page, search_query)
    page.search(search_query).map do |element|
        if !element.nil? && !element["alt"].nil?
            element["alt"]
        end
    end
end

agent.get("http://www.linkedin.com/wvmx/profile?trk=nmp_profile_stats_viewed_by") do |page|
    names = search_image_class(page, 'img[@class="photo"]')
    titles = search_class(page, 'dd[@class = "title"]')
    locations = search_class(page, 'dd[@class="location"]')
    industries = search_class(page, 'dd[@class="industries"]')
end