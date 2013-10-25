class Message < ActiveRecord::Base
  belongs_to :post
  belongs_to :blog

  validates :author, :message, :presence => true
  validates :message, :length => {:minimum => 15}

  attr_accessible :author, :message
end
