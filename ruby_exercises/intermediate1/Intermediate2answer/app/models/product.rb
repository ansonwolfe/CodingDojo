class Product < ActiveRecord::Base
  belongs_to :category
  has_many :comments
  attr_accessible :description, :name, :pricing

  validates :name, :presence => true
end
