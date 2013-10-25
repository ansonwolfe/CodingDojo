class CommentsController < ApplicationController
  def new	
  	@comment = Comment.new
  end

  def destroy
  end

  def create
  	@comment = User.find(params[:user_id]).comments.new(params[:comment])

  	if @comment.save
      @user = User.find(params[:user_id])
  		redirect_to @user, notice: 'User was successfully created.'
  	else
  		render action: "new"
  	end
  end
end
