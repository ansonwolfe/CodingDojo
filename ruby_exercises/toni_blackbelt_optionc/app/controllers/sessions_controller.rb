class SessionsController < ApplicationController
  def new
  end

  def create
  	@user = User.authenticate(params['email'], params['password'])

  	if @user.nil?
  		flash.now[:error] = "Invalid email/password combination."
  		render :new
  	else
  		sign_in @user
  		redirect_to "/friendbook/home"
  	end
  end

  def destroy
  	sign_out
  	redirect_to signin_path
  end
end
