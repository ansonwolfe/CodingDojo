class AddFriendToComments < ActiveRecord::Migration
  def change
    add_column :comments, :friend_id, :integer
  end
end
