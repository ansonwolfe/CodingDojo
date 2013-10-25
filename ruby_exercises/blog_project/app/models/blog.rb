class Blog < ActiveRecord::Base
  attr_accessible :description, :name

  has_many :posts, :dependent => :destroy
  has_many :messages, :through => :posts

  validates :name, :description, :presence => true

end
