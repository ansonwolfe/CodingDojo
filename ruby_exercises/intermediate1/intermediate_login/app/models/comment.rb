class Comment < ActiveRecord::Base
  belongs_to :user
  attr_accessible :content, :friend_id
end
