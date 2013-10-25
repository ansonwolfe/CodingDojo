class Friend < ActiveRecord::Base
  belongs_to :user
  attr_accessible :friend_id, :status, :user_id
end
