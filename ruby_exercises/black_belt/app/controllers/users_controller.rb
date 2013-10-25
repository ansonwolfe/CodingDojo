class UsersController < ApplicationController
  def new
  	@user = User.new
  end

  def create
  	@user = User.new(params[:user])
    if @user.save
   	  sign_in @user
      redirect_to @user, notice: 'User was successfully created.'
    else
      # render :text => "here"
      render action: "new"
    end
  end

  def show
  	@user_id = session[:user_id]
  	@user = User.find(params[:id])
  	# find all users who are not already 
  	#QUERY NEEDS TO FILTER OUT THOSE WHO ARE ALREADY BEING RESQUESTED
  	@users = User.find_by_sql("SELECT * from users 
  		LEFT OUTER JOIN friends ON users.id = friends.user_id
  		WHERE users.id != '#{@user_id}' 
  		")
  
# this query finds those asking for friendship - OK
  	@notices = User.find_by_sql("SELECT users.id, first_name, last_name from users 
  		LEFT JOIN friends ON users.id = friends.user_id
  		WHERE friends.friend_id = '#{@user_id}'
  		AND friends.status = 1")
  end

  	def index
		@all_users = User.all
	end

end