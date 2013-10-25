class Friend < ActiveRecord::Base
  belongs_to :user
  attr_accessible :email, :friend_id, :name, :status, :user_id
end
