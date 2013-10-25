class CreateSkills < ActiveRecord::Migration
  def change
    create_table :skills do |t|
      t.integer :site_id
      t.string :name
      t.integer :count
      t.integer :source_id

      t.timestamps
    end
  end
end
