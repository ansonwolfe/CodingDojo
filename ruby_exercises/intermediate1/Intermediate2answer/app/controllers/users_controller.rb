class UsersController < ApplicationController
  layout "users"

  def index
  	@users = User.all
  end

  def show
    @user = User.find(params[:id])
  end

  def new
    @user = User.new
  end

  def edit
    @user = User.find(params[:id])
  end

  def create
  	@user = User.new(params[:user])

  	if @user.save
  		flash[:success] = "You have successfully created a user!"
  	else
  		flash[:errors] = @user.errors.full_messages
  	end

    render "new"
  end

  def update
    @user = User.find(params[:id])

    if @user.update_attributes(params[:user])
      flash[:message] = "Profile updated!"
      redirect_to edit_user_path(params[:id])
    else
      flash[:message] = "Update Fail"
      redirect_to edit_user_path(params[:id])
    end
  end

  def destroy
    @user = User.find(params[:id])

    if @user.destroy
      redirect_to users_path
    else
      redirect_to user_path(params[:id])
      flash[:message] = "Something went wrong while deleting this user."
    end
  end
end
