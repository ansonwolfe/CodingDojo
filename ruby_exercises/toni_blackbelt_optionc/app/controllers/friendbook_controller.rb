class FriendbookController < ApplicationController
  def users
  	@users = User.all
  	@user = current_user
  end 

  def home
  	if signed_in?
#   if user is signed in...	
	  	@user = current_user
	    @users = User.all
	    @friends = Friend.where(:friend_id => current_user.id, :status =>"friends")
	    #find from Friend table where the current user is the 'recipient' of friend relationship and status is already 'friends'
	    @notifications = Friend.where(:friend_id => current_user.id, :status=> "invite sent")
	    #find from Friend table where current user is the 'recipient' of friend relationshp and status is 'invite sent'
	    @allFriends = Friend.where(:friend_id => current_user.id)
	    #this one seems a bit redundant since all records with current user as 'recipient' of friendship is grabbed
	    
	else
	end
  end

  def friends
  	if signed_in?
  		@user = current_user
  		@users = User.where(:id => current_user.id)
  		@friends = Friend.where(:friend_id => current_user.id, :status =>"friends")
  	else
  	end
  end

  def create
  	if signed_in?
  		@invited = Friend.new(params['invited'])
	  	@inviter = Friend.new(params['inviter'])

	  	if @invited.save && @inviter.save
	  		redirect_to :back
	  	else
  		end
  	else
	end
  end

  def update
  	@inviter = Friend.find(params['user_id'])
  	@invited = Friend.find(params['friend_id'])

  	if @inviter.update_attributes(params['inviter'])
  		@invited = Friend.find(params['friend_id'])
  		@invited.update_attributes(params['invited'])
  		redirect_to :back
  	else
  		redirect_to :back
  	end
  end

  def destroy
  	@inviter = Friend.find(params['user_id'])
  	@invited = Friend.find(params['friend_id'])
  	@inviter.destroy
  	@invited.destroy
  	redirect_to :back
  end
end
