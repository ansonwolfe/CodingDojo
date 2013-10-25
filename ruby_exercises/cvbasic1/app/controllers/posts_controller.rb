class PostsController < ApplicationController
  def index
  		@message = "hello world"

  	@errors = Array.new()
	@errors.push("Error msg1")
	@errors.push("Error msg2")
	@errors.push("Error msg3")

  end

  def new

  end

  def create
  	render :text => params	
  end
end
