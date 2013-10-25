class CreateScrapes < ActiveRecord::Migration
  def change
    create_table :scrapes do |t|
      t.references :site
      t.string :url

      t.timestamps
    end
    add_index :scrapes, :site_id
  end
end
