class User < ActiveRecord::Base
  attr_accessible :email_address, :first_name, :last_name, :password, :password_confirmation

  validates :first_name, :last_name, :password, :email_address, :presence => true
  validates :password, :confirmation => true, :length => {:minimum => 4}, :allow_blank => true
  VALID_EMAIL_REGEX = /^([\w\.%\+\-]+)@([\w\-]+\.)+([\w]{2,})$/i
  validates :email_address, :format => {:with => VALID_EMAIL_REGEX}, :allow_blank => true
end
