# basic 1

puts "Enter first number"
num1 = gets.chomp.to_i
puts "Enter second number"
num2 = gets.chomp.to_i
rand = rand(1..4)


if rand == 1
	answer = num1 + num2
	operation = "addition"
elsif rand ==2
	answer = num1 - num2
	operation = "subtraction"
elsif rand == 3
	answer = num1 * num2
	operation = "multiplication"	
else
	answer = num1 / num2
	operation = "division"	
end

puts "Answer is #{answer}. Operation used is #{operation}."

			
	

