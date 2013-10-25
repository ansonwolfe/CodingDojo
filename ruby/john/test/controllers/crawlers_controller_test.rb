require 'test_helper'

class CrawlersControllerTest < ActionController::TestCase
  test "should get get" do
    get :get
    assert_response :success
  end

end
