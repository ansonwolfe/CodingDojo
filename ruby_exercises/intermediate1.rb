monster1 = {:health => 500}
monster2 = {:health => 500}
	# attacks = Array.new

for i in 1..5
	# attacks << rand(100)
	dmg1 = rand(100)
	monster2[:health] = monster2[:health] - dmg1
	dmg2 = rand(100)
	monster1[:health] = monster1[:health] - dmg2
	puts "ROUND %i: " %i
	puts "Monster1 attacks with #{dmg1} damage!"
	puts "monster2's health is now #{monster2[:health]} / 500"
	puts "Monster2 attacks with #{dmg2} damage!"
	puts "monster1's health is now #{monster1[:health]} / 500"
	puts "\n"
end

if monster1[:health] > monster2[:health]
	puts "Monster 1 is the winner!"
else monster1[:health] > monster2[:health]
	puts "Monster 2 is the winner!"
end

=begin
ROUND 1:
monster1 attacks monster2 with 100 damage
monster2's health is now 400/500
monster 2 attacks monster1 with 50 damage
monster1's health is now 450/500
.......

ROUND 5:
monster1 attacks monster2 with 50 damage
monster2's health is now 210/500
monster2 attacks monster1 with 95 damage
moster1's health is now 195/500

monster2 wins the game!
=end
