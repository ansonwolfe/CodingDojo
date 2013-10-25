Intermediate assignment:

Number 1:

SELECT first_name AS First_Name, last_name AS Last_name, email, address, city.city, country.country AS Country
    FROM address
    LEFT JOIN customer ON city_id = customer.address_id
    LEFT JOIN city ON address.city_id = city.city_id
    LEFT JOIN country ON city.country_id = country.country_id
    WHERE address.city_id = '312'; 
    
Number 2:

SELECT film.title, film.description, film.release_year, film.rating, film.special_features, category.name FROM film
    LEFT JOIN film_category ON film.film_id = film_category.film_id
    LEFT JOIN category ON film_category.category_id = category.category_id
    WHERE category.name = 'Comedy';
    
Number 3:

SELECT film.title, film.description, film.release_year FROM film
    LEFT JOIN film_actor ON film.film_id = film_actor.film_id
    WHERE film_actor.actor_id = 5;
    
Number 4:

SELECT customer.first_name, customer.last_name, customer.email, customer.address_id, address.city_id, store.store_id FROM customer
    LEFT JOIN store ON store.store_id = customer.store_id
    LEFT JOIN address ON customer.address_id = address.address_id
    WHERE (address.city_id = 1 OR address.city_id = 42 OR address.city_id = 312 OR address.city_id = 459) AND store.store_id = 1;   
        
Number 5:

SELECT film.title, film.description, film.release_year, film.rating, film.special_features, film_actor.actor_id FROM film
    LEFT JOIN film_actor ON film.film_id = film_actor.film_id
    WHERE film_actor.actor_id = 15 AND film.rating = 'G' AND film.special_features = 'behind the scenes';
    
Number 6:

SELECT actor.first_name, actor.last_name, actor.last_update FROM actor
    LEFT JOIN film_actor ON actor.actor_id = film_actor.actor_id
    WHERE film_actor.film_id = 369;
    
Number 7:

SELECT title, description, release_year, rating, rental_rate, special_features, category.name
    FROM film
    LEFT JOIN film_category ON film.film_id = film_category.film_id
    LEFT JOIN category ON film_category.category_id = category.category_id
    WHERE category.name = 'Drama'
    AND rental_rate = '2.99';
    
Number 8:

SELECT film.title, film.description, film.release_year, rating, special_features, actor.first_name, actor.last_name
FROM film 
LEFT JOIN film_actor ON film.film_id = film_actor.film_id
LEFT JOIN actor ON film_actor.actor_id = actor.actor_id
LEFT JOIN film_category ON film.film_id = film_category.film_id
LEFT JOIN category ON film_category.category_id = category.category_id
WHERE actor.first_name = 'Sandra'
AND actor.last_name ='Kilmer'
AND category.name = 'Action'