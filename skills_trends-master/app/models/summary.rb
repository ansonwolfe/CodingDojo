class Summary < ActiveRecord::Base
  belongs_to :location
  attr_accessible :skills_list
end
