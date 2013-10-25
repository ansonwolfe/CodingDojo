class CreateSearchUrls < ActiveRecord::Migration
  def change
    create_table :search_urls do |t|
      t.references :site
      t.string :url

      t.timestamps
    end
    add_index :search_urls, :site_id
  end
end
