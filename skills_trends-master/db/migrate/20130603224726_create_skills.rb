class CreateSkills < ActiveRecord::Migration
  def change
    create_table :skills do |t|
      t.references :site
      t.string :name
      t.integer :count
      t.references :source

      t.timestamps
    end
    add_index :skills, :site_id
    add_index :skills, :source_id
  end
end
