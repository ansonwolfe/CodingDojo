array = [3,5,1,2,7,9,8,13,25,32]

# sum all numbers in array
puts array.inject(0) {|result, element| result + element}

# new array of numbers bigger than 10
puts array.reject {|num| num < 10}

names = ["John", "KB", "Oliver","Cory", "Matthew","Christopher"]
puts "shuffle names : "
puts names.shuffle

puts "new array with names > 5 letters :"
new_names = names.reject { |name| name.length < 5}
puts new_names

puts "26 letters :"
letters = ('a'..'z').to_a.shuffle
puts "last letter is " + letters.at(-1)

if %w{a e i o u}.include? (letters.at(0))
	puts "first letter is " + letters.at(0) + ", a vowel!"
else
	puts "first letter is " + letters.at(0) + ", not a vowel!"
end		

puts "random numbers"

numbers = (55..100).to_a.sample 5
print numbers.sort
# puts "min is " + numbers.min.to_s
puts "min is #{numbers.min}"
puts "max is %i" % numbers.max
# just another way to do it... this has to be converted to string first

# random 5 char into array... Ruby requires you to declare new array first
# multiple ways to doing it with regular while loop, for loop and times
rand_array = Array.new
# while i = 0
for i in 0..10
	random_char = (0...5).map{(65+rand(26)).chr}.join
	# puts random_char
	rand_array.push(random_char)
	# i +=1
end

p rand_array

# another way to do it using .times
# random_char2 = (0...5).map{(65+rand(26)).chr}.join

new_rand_array = Array.new

10.times {new_rand_array << (0...5).map{(65+rand(26)).chr}.join}

# 10.times {new_rand_array << random_char2}
puts new_rand_array.to_s