class Dojo < ActiveRecord::Base
  attr_accessible :city, :name, :state
  has_many :ninjas, :dependent => :destroy

  validates :name, :city, :state, :presence => true
  validates :state, :length => {:minimum => 2}


end
