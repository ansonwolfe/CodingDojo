class Comment < ActiveRecord::Base
  belongs_to :product
  attr_accessible :author, :content

  validates :content, :author, :presence => true
end
