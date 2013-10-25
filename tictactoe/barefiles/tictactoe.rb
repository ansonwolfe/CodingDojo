require_relative 'board.rb'

puts "Starting tic tac toe game"

players = ['X', 'O']
current_player = players[rand(0)]
b = Board.new(current_player)
b.display()
puts 

while not b.board_full() and not b.winner()
	b.ask_player_move(current_player)
	current_player = b.get_next_turn()
	b.display()
	puts
end


if b.winner()
	puts "player " + b.get_next_turn() + "wins."
else 
	puts "Tie! "
end 

puts "Game Over"			

# check if board is full
def board_full
	for row in 0..board_max
		for col in 0..board_max
			if @board[row][col] == empty_pos
				return false
			end
		end
	end
	return true
end		

# check winners
def winner
	winner = winner_rows()
	if winner
		return winner
	end
	
	winner = winner_cols()
	if winner
		return winner
	end 
	
	winner = winner_diagonals()
	if winner
		return winner
	end
	return
end

def winner_rows
	for row_index in 0..board_max
		first_symbol = @board[row_index][0]

		for col_index in 0..board_max
			if first_symbol != @board[row_index][col_index]
				break
			elseif col_index == board_max and first_symbol != empty_pos
				return first_symbol
			end
		end
	end
	return
end

def winner_cols
	for col_index in 0..board_max
		first_symbol = @board[0][col_index]

		for row_index in 0..board_max
			if first_symbol != @board[row_index][col_index]
				break
			elseif row_index == board_max and first_symbol != empty_pos
				return first_symbol
			end
		end
	end
	return
end

def winner_diagonals
	first_symbol = @board[0][0]
	for index in 0..board_max
		if first_symbol != @board[index][index]
			break
		elseif index == board_max and first_symbol != empty_pos
			return first_symbol
		end
	end

	first_symbol = @board[0][board_max]
	row_index = 0
	col_index = board_max

	while row_index < board_max
		row_index = row_index + 1
		col_index = col_index + 1

		if first_symbol != @board[row_index][col_index]
			break
		elseif row_index == board_max and first_symbol != empty_pos
			return first_symbol
		end
	end
	return
end


def ask_player_move(current_player)
	if current_player == computer
		computer_move(current_player)
	else 
		player_move(current_player)
	end
end

def player_move(current_player)	
	played = false

	while not played
		puts "Player " + current_player + ": where would you like to play?"
		move = gets.to_i - 1
		col = move % @board.size
		row = (move - col) / @board.size

		if validate_position(row, col)
			@board[row][col] = current_player
			played = true
		end
	end
end

def computer_move(current_player)
	row = -1 
	col = -1
	found = 'F'

	check_rows(computer, found)
	check_cols(computer, found)
	check_diagonals(computer, found)

	check_rows(human_player, found)
	check_cols(human_player, found)
	check_diagonals(human_player, found)

	if found == 'F'
		if @board[1][1] == empty_pos
			row = 1
			col = 1
			@board[row][col] = current_player
		elseif available_corner()
			pick_corner(current_player)
		else
			until validate_position(row,col)
			row = rand(@board.size)
			col = rand(@board.size)
			end
		@board[row][col] = current_player
		end
	end
end


def validate_position(row,col)
	if row <= @board.size and col <= @board.size
		if @board[row][col] == empty_pos
			return true
		else
			puts "Position is occupied"
		end
	else 
		puts "Invalid position"
	end
	return false
end


def get_next_turn
	if @current_player == "X"
		@current_player = "O"
	else
		@current_player = "X"
	end
	return @current_player
end	

