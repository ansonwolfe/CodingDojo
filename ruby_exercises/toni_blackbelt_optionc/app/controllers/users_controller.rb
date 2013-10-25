class UsersController < ApplicationController
  def index
    @users = User.all
  end

  def new
    @user = User.new
  end

  def show
    @user = User.find(params[:id])
    @users = User.all
    @friends = Friend.where(:user_id => params[:id])

  end

  def create
    @user = User.new(params['user'])
    if @user.save
      sign_in @user
      redirect_to "/friendbook/home"
    else
      render :new
    end
  end

  def edit
    @user = User.find(params[:id])
  end

  def update
    @user = User.find(params[:id])
    if @user.update_attributes(params[:user])
       redirect_to @user
    else
      render :edit
    end
  end

  def destroy
    @user = User.find(params[:id])
    @user.destroy
    redirect_to :action => 'index'
  end
end
