class Source < ActiveRecord::Base
  belongs_to :site
  attr_accessible :data_source
end
