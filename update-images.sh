#!/bin/bash

# Home - Heizungsbau Hero
sed -i 's|<section class="relative h-screen bg-gradient-to-br from-gray-900 to-gray-700 flex items-center">|<section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('\''https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1920'\'');">|' index.html

# Heizungsbau Hero
sed -i 's|<section class="relative h-screen bg-gradient-to-br from-orange-600 to-red-600 flex items-center">|<section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('\''https://images.unsplash.com/photo-1607400201889-565b1ee75f8e?w=1920'\'');">|' heizungsbau.html

# Klimaanlage Hero
sed -i 's|<section class="relative h-screen bg-gradient-to-br from-sky-500 to-blue-600 flex items-center">|<section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('\''https://images.unsplash.com/photo-1631889993959-41b4e9c6e3c5?w=1920'\'');">|' klimaanlage.html

# Kaminöfen Hero
sed -i 's|<section class="relative h-screen bg-gradient-to-br from-amber-600 to-orange-600 flex items-center">|<section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('\''https://images.unsplash.com/photo-1574273670240-05d30e1c4ece?w=1920'\'');">|' kaminoefen.html

# Badsanierung Hero
sed -i 's|<section class="relative h-screen bg-gradient-to-br from-blue-500 to-cyan-500 flex items-center">|<section class="relative h-screen bg-cover bg-center flex items-center" style="background-image: url('\''https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=1920'\'');">|' badsanierung.html

echo "✅ Hero-Bilder eingefügt!"
