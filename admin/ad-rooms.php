<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - DormiTech Admin</title>
    <link rel="stylesheet" href="../css/admin-styles.css">
    <link rel="icon" href="../img/favicon.png" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="ad-dashboard.php">
                <img src="../img/logo.png" alt="DORMITECH Logo">
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="ad-dashboard.php">Home</a></li>
                <li><a href="ad-tenants.php">Tenants</a></li>
                <li><a href="ad-rooms.php" class="selected">Rooms</a></li>
                <li><a href="ad-payments.php">Payments</a></li>
                <li><a href="ad-complaints.php">Complaints</a></li>
                <li><a href="ad-chat.php">Chat</a></li>
                <li><a href="ad-profile.php">Admin</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Manage Rooms</h1>

        <section class="ad-rooms-list">
            <div class="ad-search">
                <input type="text" placeholder="Search rooms...">
            </div>
            <h2>Room List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Tenant</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>101</td>
                        <td>Jan Carlo Niñonuevo</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>102</td>
                        <td>Clarrise Mercado</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>201</td>
                        <td>AJ Angela Uy</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>202</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>203</td>
                        <td>Maria Clara Santos</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>204</td>
                        <td>Jose Rizal Garcia</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>205</td>
                        <td>Andres Bonifacio Reyes</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>206</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>207</td>
                        <td>Antonio Liwanag</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>208</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>209</td>
                        <td>Michael Tan</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>210</td>
                        <td>Lucia Cruz</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>211</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>212</td>
                        <td>Alice Navarro</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>213</td>
                        <td>Bobby Villanueva</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>214</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>215</td>
                        <td>Rafael Perez</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>216</td>
                        <td>Veronica Castillo</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>217</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>218</td>
                        <td>Felicia Quintero</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>219</td>
                        <td>Marvin Salvador</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                    <tr>
                        <td>220</td>
                        <td></td>
                        <td>Vacant</td>
                        <td><button>Assign</button></td>
                    </tr>
                    <tr>
                        <td>221</td>
                        <td>Samuel Gonzales</td>
                        <td>Occupied</td>
                        <td><button>Remove</button></td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    
</body>
</html>

<script src="../js/ad-scripts.js"></script>