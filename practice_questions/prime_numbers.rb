# initialise our counter
i = 1

# i: [0,100]
while (i <= 100)
	# initialize prime flag
	prime_flat = true
	j = 2
	# test divisibility of i from [0, i/2]
	while (j <= i / 2)

		if(i%j == 0)
			prime_flag = false
			#break
		end
		j = j + 1
	end
	# we found a prime?

	if prime_flag
		puts "Prime ==> " i.to_s
	end
	# increment the counter
	i += 1
end				