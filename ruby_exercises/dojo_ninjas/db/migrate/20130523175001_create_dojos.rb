class CreateDojos < ActiveRecord::Migration
  def change
    create_table :dojos do |t|
      t.string :name
      t.string :city
      t.string :state

      t.timestamps
    end
  end
end
