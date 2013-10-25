class Skill < ActiveRecord::Base
  belongs_to :site
  belongs_to :source
  attr_accessible :count, :name, :site_id

  def crawler
    # require 'mechanize'
    require 'nokogiri'
    require 'open-uri'
    url = Array.new
    url[0] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=Rails&src=19&x=all&p=m" #rails 
    url[1] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=PHP&src=19&x=all&p=m" #php
    url[2] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=Java&src=19&x=all&p=m" #java
    url[3] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=C%2B%2B&src=19&x=all&p=m" #c++
    url[4] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=Objective-C&src=19&x=all&p=m" #objective-c
    url[5] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=CodeIgniter&src=19&x=all&p=m" #codeigniter
    url[6] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=MVC&src=19&x=all&p=m" #mvc
    url[7] = "http://www.dice.com/job/results/silicon-valley?caller=advanced&q=jQuery+Ajax+javascript&src=19&x=any&p=m" #javascript jquery ajax
    url[8] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=.Net&src=19&x=any&p=m" #.net
    url[9] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=Node.JS&src=19&x=any&p=m" #node.js
    url[10] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=Android&src=19&x=any&p=m" #Android
    url[11] = "http://www.dice.com/job/results/silicon-valley?caller=searchagain&q=iOS&src=19&x=any&p=m" #iOS
    
    
    @site_scrape = Array.new
    @search_input = Array.new
    for i in 0..url.count-1 do
        doc = Nokogiri::HTML(open(url[i]))
        @site_scrape[i] = doc.xpath(".//*[@id='searchResHD']/h2").inner_text.split.last
        @search_input[i] = doc.xpath(".//*[@id='Keyword_1']/div/div").inner_text
        Skill.find(i+18).update_attributes( :count => @site_scrape[i])
    end
 
  end
end
