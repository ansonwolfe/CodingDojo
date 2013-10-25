class CreateSources < ActiveRecord::Migration
  def change
    create_table :sources do |t|
      t.references :site
      t.string :data_source

      t.timestamps
    end
    add_index :sources, :site_id
  end
end
