class User < ActiveRecord::Base
  attr_accessible :age, :email_address, :first_name, :last_name

  validates :first_name, :last_name, :age, :email_address, :presence => true
  validates :first_name, :last_name, :length => {:minimum => 2}
  validates :age, :numericality => { :only_integer => true }
  validates :age, :numericality => { :greater_than_or_equal_to => 10 }
  validates :age, :numericality => { :less_than_or_equal_to => 150 }


end
