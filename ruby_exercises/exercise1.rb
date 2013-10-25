class MathDojo

	def initialize()
		@answer = 0
	end

	def add(*num)
		num.each {|number| @answer += number}
		return self
	end
	
	def subtract(*num)
		num.each {|number| @answer -= number}
		return self
	end
	def answer
		puts @answer
	end
	
end
MathDojo.new.add(2).add(2,5).subtract(3,2).add(66,6,2,5,2).answer


			