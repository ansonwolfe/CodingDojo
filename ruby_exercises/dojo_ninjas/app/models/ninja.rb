class Ninja < ActiveRecord::Base

  attr_accessible :first_name, :last_name
  belongs_to :dojo

   validates :first_name, :last_name, :presence => true
end
