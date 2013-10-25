class UsersController < ApplicationController
  def new
  	@user = User.new
  end

  def create
  	@user = User.new(params[:user])
  	if @user.save
  		redirect_to @user, notice: 'User was successfully created.'
  	else
  		render action: "new"
  	end
  end

  def show
  	@user = User.find(params[:id])
    @comment = @user.comments.build
    @user_comments = @user.comments.order("created_at DESC")
  end

  def index
  	@user = User.all
  end
  
end
