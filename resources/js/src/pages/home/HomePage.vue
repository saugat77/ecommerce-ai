<template>
    <div class="home-page">

        <!-- HERO -->
        <HeroBanner />

        <!-- TRENDING -->
        <TrendingSlider title="trending" :products="trending_products" />

        <!-- BEST SELLING -->
        <BestSelling />

        <!-- OFFER -->
        <OfferBanner />

        <!-- FEATURED PRODUCTS -->
        <ProductGrid title="Featured Products" :products="featuredProducts" />

        <Chatbox />

    </div>
</template>

<script>
import HeroBanner from '../../../src/components/common/HeroBanner.vue'
import TrendingSlider from '../../../src/components/common/TrendingSlider.vue'
import BestSelling from '../../../src/components/common/BestSelling.vue'
import OfferBanner from '../../../src/components/common/OfferBanner.vue'
import ProductGrid from '../../../src/components/common/ProductGrid.vue'
import Chatbox from '../../components/common/Chatbox.vue'
export default {
    components: {
        HeroBanner,
        TrendingSlider,
        BestSelling,
        OfferBanner,
        ProductGrid,
        Chatbox
    },

    data() {
        return {
            search: "",
            currentPage: 1,
            perPage: 8,
            selectedCategory: "All",

            categories: ["All", "Electronics", "Fashion", "Home", "Beauty", "Sports"],
            bestSellingProducts: [
                {
                    id: 1,
                    name: "Wireless Headphones",
                    description: "High quality sound with deep bass",
                    price: 2500,
                    image: "https://picsum.photos/400/300?random=1"
                },
                {
                    id: 2,
                    name: "Smart Watch",
                    description: "Track fitness and notifications",
                    price: 3200,
                    image: "https://picsum.photos/400/300?random=2"
                },
                {
                    id: 3,
                    name: "Gaming Mouse",
                    description: "RGB ultra responsive gaming mouse",
                    price: 1500,
                    image: "https://picsum.photos/400/300?random=3"
                },
                {
                    id: 4,
                    name: "Bluetooth Speaker",
                    description: "Loud and clear portable speaker",
                    price: 1800,
                    image: "https://picsum.photos/400/300?random=4"
                }
            ],

            featuredProducts: [
                {
                    id: 5,
                    name: "Nike Sneakers",
                    description: "Comfortable running shoes",
                    price: 5500,
                    image: "https://picsum.photos/400/300?random=5"
                },
                {
                    id: 6,
                    name: "Backpack",
                    description: "Waterproof travel backpack",
                    price: 2200,
                    image: "https://picsum.photos/400/300?random=6"
                },
                {
                    id: 7,
                    name: "Smartphone",
                    description: "Latest Android device",
                    price: 25000,
                    image: "https://picsum.photos/400/300?random=7"
                },
                {
                    id: 9,
                    name: "khatra",
                    description: "High performance work laptop",
                    price: 85000,
                    image: "https://picsum.photos/400/300?random=9"
                },
                {
                    id: 8,
                    name: "Laptop",
                    description: "High performance work laptop",
                    price: 85000,
                    image: "https://picsum.photos/400/300?random=8"
                }, 
            ],
            products: [
                {
                    id: 1,
                    name: "Smart Watch",
                    price: 2500,
                    category: "Electronics",
                    image: "https://via.placeholder.com/400",
                    description: "Health tracking + premium design"
                },
                {
                    id: 2,
                    name: "Sneakers",
                    price: 3500,
                    category: "Fashion",
                    image: "https://via.placeholder.com/400",
                    description: "Comfort + street style"
                },
                {
                    id: 3,
                    name: "Headphones",
                    price: 1800,
                    category: "Electronics",
                    image: "https://via.placeholder.com/400",
                    description: "Noise cancelling audio"
                },
                {
                    id: 4,
                    name: "T-Shirt",
                    price: 800,
                    category: "Fashion",
                    image: "https://via.placeholder.com/400",
                    description: "Premium cotton wear"
                },
            ],
            trending_products: {
                "hot": [
                    {
                        "id": 1,
                        "name": "Wireless Noise Cancelling",
                        "price": 2800,
                        "image": "https://picsum.photos/400/400?random=1",
                        "description": "Deep bass, premium sound quality",
                        "tag": "Hot"
                    },
                    {
                        "id": 2,
                        "name": "Gaming Mechanical Keyboard RGB",
                        "price": 5000,
                        "image": "https://picsum.photos/400/400?random=2",
                        "description": "Ultra responsive gaming keys",
                        "tag": "Hot"
                    },
                    {
                        "id": 3,
                        "name": "Smart Watch Ultra Series",
                        "price": 3500,
                        "image": "https://picsum.photos/400/400?random=3",
                        "description": "Fitness + notifications tracking",
                        "tag": "Hot"
                    },
                    {
                        "id": 4,
                        "name": "5G Smartphone Pro Max",
                        "price": 45000,
                        "image": "https://picsum.photos/400/400?random=4",
                        "description": "High performance flagship phone",
                        "tag": "Hot"
                    },
                    {
                        "id": 5,
                        "name": "5G Smartphone Pro Max 2",
                        "price": 45000,
                        "image": "https://picsum.photos/400/400?random=5",
                        "description": "High performance flagship phone",
                        "tag": "Hot"
                    }
                ],

                "recent": [
                    {
                        "id": 5,
                        "name": "Leather Travel Backpack",
                        "price": 2600,
                        "image": "https://picsum.photos/400/400?random=5",
                        "description": "Waterproof premium travel bag",
                        "tag": "Recent"
                    },
                    {
                        "id": 6,
                        "name": "LED Smart Desk Lamp",
                        "price": 1100,
                        "image": "https://picsum.photos/400/400?random=6",
                        "description": "Modern touch control lamp",
                        "tag": "Recent"
                    },
                    {
                        "id": 7,
                        "name": "Men Casual Slim Shirt",
                        "price": 1200,
                        "image": "https://picsum.photos/400/400?random=7",
                        "description": "Comfortable cotton wear",
                        "tag": "Recent"
                    },
                    {
                        "id": 8,
                        "name": "Bluetooth Speaker Mini Boom",
                        "price": 1900,
                        "image": "https://picsum.photos/400/400?random=8",
                        "description": "Portable loud sound speaker",
                        "tag": "Recent"
                    }
                ],

                "popular": [
                    {
                        "id": 9,
                        "name": "Smart Watch Fitness Edition",
                        "price": 3200,
                        "image": "https://picsum.photos/400/400?random=9",
                        "description": "Best seller fitness tracker",
                        "tag": "Popular"
                    },
                    {
                        "id": 10,
                        "name": "Wireless Earbuds Pro",
                        "price": 2200,
                        "image": "https://picsum.photos/400/400?random=10",
                        "description": "Crystal clear sound quality",
                        "tag": "Popular"
                    },
                    {
                        "id": 11,
                        "name": "Office Ergonomic Chair",
                        "price": 9800,
                        "image": "https://picsum.photos/400/400?random=11",
                        "description": "Comfortable long-hour seating",
                        "tag": "Popular"
                    },
                    {
                        "id": 12,
                        "name": "Running Shoes AirFlex",
                        "price": 4200,
                        "image": "https://picsum.photos/400/400?random=12",
                        "description": "Lightweight sports shoes",
                        "tag": "Popular"
                    }
                ],

                "sale": [
                    {
                        "id": 13,
                        "name": "Fitness Dumbbell Set",
                        "price": 3200,
                        "image": "https://picsum.photos/400/400?random=13",
                        "description": "Home workout equipment",
                        "tag": "On Sale"
                    },
                    {
                        "id": 14,
                        "name": "Sneakers Classic Edition",
                        "price": 3500,
                        "image": "https://picsum.photos/400/400?random=14",
                        "description": "Discounted stylish sneakers",
                        "tag": "On Sale"
                    },
                    {
                        "id": 15,
                        "name": "Women Handbag Premium",
                        "price": 3700,
                        "image": "https://picsum.photos/400/400?random=15",
                        "description": "Luxury fashion handbag",
                        "tag": "On Sale"
                    },
                    {
                        "id": 16,
                        "name": "Yoga Mat Extra Comfort",
                        "price": 900,
                        "image": "https://picsum.photos/400/400?random=16",
                        "description": "Soft anti-slip yoga mat",
                        "tag": "On Sale"
                    }
                ]
            }
        };
    },

    computed: {
        filteredProducts() {
            return this.products.filter(p => {
                const matchSearch = p.name.toLowerCase().includes(this.search.toLowerCase());

                const matchCategory =
                    this.selectedCategory === "All" ||
                    p.category === this.selectedCategory;

                return matchSearch && matchCategory;
            });
        },

        totalPages() {
            return Math.ceil(this.filteredProducts.length / this.perPage);
        },

        paginatedProducts() {
            const start = (this.currentPage - 1) * this.perPage;
            return this.filteredProducts.slice(start, start + this.perPage);
        }
    },

    methods: {
        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
            }
        },

        filterCategory(cat) {
            this.selectedCategory = cat;
            this.currentPage = 1;
        }
    }
};
</script>

<style scoped>
.shop-wrapper {
    background: #f4f6fb;
    min-height: 100vh;
}

/* HERO */
.hero {
    background: linear-gradient(135deg, #0f172a, #1e293b);
}

/* CENTER CONTAINER (IMPORTANT FIX) */
.shop-container {
    max-width: 1450px;
    margin: auto;
    padding: 20px;
}

/* FILTER */
.filter-panel {
    background: white;
    padding: 15px;
    border-radius: 16px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
    position: sticky;
    top: 20px;
}

/* FILTER BUTTON */
.btn-filter {
    background: #f8fafc;
    border: 1px solid #e5e7eb;
    font-size: 13px;
    border-radius: 10px;
}

.btn-filter.active {
    background: #0f172a;
    color: white;
}

/* PRODUCT CARD (MODERN FEEL) */
.product-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
    transition: 0.25s;
}

.product-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.12);
}

.img-box img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

/* TEXT */
.title {
    font-weight: 600;
}

.desc {
    font-size: 12px;
    color: #6b7280;
    height: 36px;
    overflow: hidden;
}

.price {
    font-weight: 700;
}

/* CTA */
.btn-accent {
    background: #ff6a00;
    color: white;
    font-weight: 600;
}

/* PAGINATION */
.pagination-modern .page-link {
    border-radius: 10px;
    margin: 0 4px;
}
</style>