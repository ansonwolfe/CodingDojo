class FriendsController < ApplicationController
  def home
  	if signed_in?
  		@user = current_user
  		@users = User.all
  		@no_friends = Friend.where(:friend_id => current_user.id, :status => "2").count
  		@friend_req = Friend.where(:friend_id => current_user, :status => "1")

  	end	

  end

  def friends
  	@friends = Friend.where(:friend_id =>current_user, :status => "2")
  end	

  # changes status to 1 so friend goes to friend approval status
 	 def create
 	 		@friend = Friend.new(params[:friend])
			# @friend = Friend.find(params[:id]).comments.new(params[:comment])

		if @friend.save
			@user = User.find(session[:user_id])
			redirect_to @user
		else
			render action: "new"	
		end	
  	end	

  	def show
  		
  	end	

	# changes status to 2 so becomes friend
	def update
		@friend = Friend.find(params[:user_id])
		@invite = Friend.find(params[:friend_id]) 

		if @friend.update_attributes(params['friend']) 
			redirect_to :back
		end	
	end	
	# destroy removes status so friend goes back to list
	def destroy
		@ignore = Friend.where(:user_id => params[:id])
		@ignore.destroy
		redirect_to @user
	end
end
