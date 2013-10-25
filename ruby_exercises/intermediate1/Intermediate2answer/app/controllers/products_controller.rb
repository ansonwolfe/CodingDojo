class ProductsController < ApplicationController
  def index
    @products = Product.all
  end

  def show
    @product = Product.find(params[:id])
    @comment = @product.comments.build
    @product_comments = @product.comments.order("created_at DESC")
  end

  def new
    @products = Product.new
  end

  def edit
    @product = Product.find(params[:id])
  end

  def create
    @product = Product.new(params[:product])

    if @product.save
      flash[:status] = true
      redirect_to new_product_path, :notice => "You have successfully created a product!"
    else
      flash[:status] = false
      redirect_to new_product_path, :notice => @product.errors.full_messages.map{|message| "<p>#{message}</p>"}.join("").html_safe
    end
  end

  def update
    @product = Product.find(params[:id])

    if @product.update_attributes(params[:product])
      flash[:message] = "Profile updated!"
      redirect_to edit_product_path(params[:id])
    else
      flash[:message] = "Update fail!"
      redirect_to edit_product_path(params[:id])
    end
  end

  def destroy
    @product = Product.find(params[:id])

    if @product.destroy
      redirect_to products_path
    else
      redirect_to products_path(params[:id])
      flash[:message] = "Something went wrong while deleting this user."
    end
  end
end
