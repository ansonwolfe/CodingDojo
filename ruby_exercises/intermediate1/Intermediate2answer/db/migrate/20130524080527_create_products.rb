class CreateProducts < ActiveRecord::Migration
  def change
    create_table :products do |t|
      t.string :name
      t.references :category
      t.text :description
      t.float :pricing

      t.timestamps
    end
    add_index :products, :category_id
  end
end
