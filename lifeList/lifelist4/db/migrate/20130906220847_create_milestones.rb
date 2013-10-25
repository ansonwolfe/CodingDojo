class CreateMilestones < ActiveRecord::Migration
  def change
    create_table :milestones do |t|
      t.string :description
      t.text :details

      t.timestamps
    end
  end
end
