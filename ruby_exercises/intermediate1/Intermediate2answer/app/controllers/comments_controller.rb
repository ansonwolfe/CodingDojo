class CommentsController < ApplicationController
	def index
		@comments = Comment.all
	end

	def create
		@comment = Product.find(params[:product_id]).comments.new(params[:comment])

		if @comment.save
			render :json => {
				:status => true,
				:comment_html => "<blockquote class='comment'>
									<p>#{@comment.content}</p>
									<small>Posted by #{@comment.author}</small>
								</blockquote>",
				:message => "Comment added successfully!"
			}
		else
			render :json => {:status => false}
		end
	end
end
