class CreateSummaries < ActiveRecord::Migration
  def change
    create_table :summaries do |t|
      t.references :location
      t.string :skills_list

      t.timestamps
    end
    add_index :summaries, :location_id
  end
end
