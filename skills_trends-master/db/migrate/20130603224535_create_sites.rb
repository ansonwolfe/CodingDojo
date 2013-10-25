class CreateSites < ActiveRecord::Migration
  def change
    create_table :sites do |t|
      t.references :location
      t.string :url
      t.string :description

      t.timestamps
    end
    add_index :sites, :location_id
  end
end
