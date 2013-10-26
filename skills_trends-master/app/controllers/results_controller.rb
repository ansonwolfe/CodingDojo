
class ResultsController < ApplicationController
  def index
    
  end

  def siliconvalley
    SearchUrl.crawl
    @dice = Skill.where(:site_id => 1).order('name ASC')
    @craig = Skill.where(:site_id => 2).order('name ASC')
  end

  def seattle
    SearchUrl.crawl
    @dice = Skill.where(:site_id => 3).order('name ASC')
    @craig = Skill.where(:site_id => 4).order('name ASC')
  end
end