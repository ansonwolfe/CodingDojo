#Number 1
SELECT Country.Name AS Country, City.CountryCode AS CountryCode, COUNT(*) AS CityCount FROM City
	LEFT JOIN Country ON Countrycode = Country.Code
	GROUP BY CountryCode 
	ORDER BY CityCount DESC;

#Number 2 both works
select Language, Percentage, Country.Name AS Country
	FROM CountryLanguage
	LEFT JOIN Country ON CountryCode = Country.Code
	WHERE Language = 'Slovene';

SELECT Country.Name AS Country, countrylanguage.Language AS language, countrylanguage.percentage AS language_percentage FROM countrylanguage
    LEFT JOIN Country ON Countrycode = Country.Code 
    WHERE countrylanguage.Language = 'Slovene'
    ORDER BY language_percentage DESC;

#number 3
SELECT City.Name, Country.Name, City.Population
	FROM City
	LEFT JOIN Country ON CountryCode = Country.Code
	WHERE City.Population > '500000' AND Country.Name = 'Mexico'
	ORDER BY City.Population DESC;

#Number 4
SELECT CountryLanguage.Language, Percentage, Country.Name AS Country
	FROM CountryLanguage
	LEFT JOIN Country ON CountryCode = Country.Code
	WHERE Percentage > '89%'
	ORDER BY Percentage DESC;

#Number 5
SELECT Name, SurfaceArea, Population from Country
    WHERE SurfaceArea < '501' AND Population > '100000'
#Number 6
SELECT GovernmentForm, Capital, LifeExpectancy FROM Country
    WHERE GovernmentForm = 'Constitutional Monarchy' AND Capital > '200' AND LifeExpectancy > '75';
#Number 7
SELECT Country.Name, City.Name, City.District, City.Population FROM City
    LEFT JOIN Country ON City.Countrycode = Country.Code
    WHERE Country.Name = 'Argentina' AND City.District = 'Buenos Aires' AND City.Population > '500000';
#Number 8
SELECT Region, Count(*) AS Countries_in_Region FROM Country
	GROUP BY Region
	ORDER BY Countries_in_Region DESC;