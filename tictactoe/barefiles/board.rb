class Board

	board_max = 2
	empty_pos = ' '

	def initialize(current_player)
		@current_player = current_player
		@board = Array.new(board_max + 1) {
			Array.new(board_max + 1) {empty_pos}
		}
	end

	def display
		puts "+ -  - - - - - - +"

		for row in 0..board_max
			print " | "

			for col in 0..board_max
				s = @board[row][col]

				if s == empty_pos
					print col + (row * 3) +1
				else
					print s
				end
				
				print " | "
			end
			
			puts "\n+ -  - - - - - - +"
		end
	end						
end		
