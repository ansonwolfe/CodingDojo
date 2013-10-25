class Location < ActiveRecord::Base
  attr_accessible :city, :geo_area, :state
end
