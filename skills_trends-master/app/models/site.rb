class Site < ActiveRecord::Base
  belongs_to :location
  attr_accessible :description, :url
end
