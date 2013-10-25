class CreateFriends < ActiveRecord::Migration
  def change
    create_table :friends do |t|
      t.references :user
      t.integer :friend_id
      t.integer :status

      t.timestamps
    end
    add_index :friends, :user_id
  end
end
